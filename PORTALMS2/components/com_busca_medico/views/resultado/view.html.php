<?php

/**
 * @version     1.0.0
 * @package     com_busca_medico
 * @copyright   Copyright (C) 2015. Todos os direitos reservados.
 * @license     GNU General Public License versão 2 ou posterior; consulte o arquivo License. txt
 * @author      Fábio Nery Pinto <contato@fabionery.com.br> - http://www.fabionery.com.br
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View to edit
 */
class Busca_medicoViewResultado extends JViewLegacy {

    protected $state;
    protected $item;
    protected $form;
    protected $params;

    /**
     * Conexão a base de dados oracle
     */
    public function conn($conn = null) {

        // Definindo
        $ora_user = "PORTALSAUDEWEB"; 
        $ora_senha = "PORTALSAUDEWEB2106 "; 

        //conexão de desenvolvimento
        $ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP) 
              (HOST=srvoradf20-scan.saude.gov)(PORT=1521)
              )
                )
                (CONNECT_DATA=(SERVICE_NAME=DFDO1.SAUDE.GOV))
                )";
                if ($ora_conexao = oci_connect($ora_user,$ora_senha,$ora_bd) ){
                    $N = "N";
                } else{
                    die;
                }

                $conn = true;
    return $ora_conexao;
}
    /**
     * Fazendo a busca
     */
    public function query($result = null) {
        $query = "select distinct p.co_cpf as CPF,
        p.no_profissional as NomeProfissional,
        p.co_cns as CodigoCNS,
        atv.co_cbo as co_cbo_ocupacao,
        NVL(p.co_sigla_estado_res, '--') as UF,
        NVL(munic.no_municipio, '--') as Municipio,
        atv.ds_atividade_profissional as Especialidade,
        'CRM-' || ch.nu_registro || '-' ||
        NVL(p.co_sigla_estado_res, '--') as NumeroRegistroFormatado,
        ch.dt_atualizacao
        from dbcnes.tb_carga_horaria_sus          ch,
        dbnacional.tb_atividade_profissional atv,
        dbcnes.tb_dados_profissional_sus     p,
        dbgeral.tb_municipio                 munic
        where ch.co_cbo = atv.co_cbo
        and ch.co_profissional_sus = p.co_profissional_sus
        and p.co_municipio_residencia = munic.co_municipio_ibge
        and rownum = 1
        ";
        $query .= "and p.co_profissional_sus = '".$_GET['nu']."'";
        // $query .= "and p.co_profissional_sus = '".$_POST['co_profissional_sus']."'";
        $query .= "order by ch.dt_atualizacao desc";

        return $query;
    }

    /**
     * Fazendo a busca
     */
    public function estabelecimento($result = null) {
        //query para retorno de estabelecimento
        $query_estabelecimento = 
        "select distinct e.co_cnes             as CodigoCNES,
        p.co_profissional_sus as CodigoSUS,
        p.co_cpf              as CPF,
        p.no_profissional     as NomeProfissional,
        p.co_cns              as CodigoCNS,
        e.co_unidade          as CodigoUnidade,
        e.no_razao_social     as RazaoSocial,
        e.no_fantasia         as Descricao,
        e.no_logradouro       as Logadouro,
        e.nu_endereco         as Endereco,
        e.no_bairro           as Bairro,
        e.nu_telefone         as Telefone,
        e.co_estado_gestor    as CodigoUF,
        uf.sg_uf              as UF,
        e.co_municipio_gestor as CodigoMunicipio,
        munic.no_municipio    as Municipio,
        e.co_cep              as CEP,
        e.nu_latitude         as Latitude,
        e.nu_longitude        as Longitude
        from dbcnes.tb_estabelecimento        e,
        dbcnes.tb_carga_horaria_sus      ch,
        dbgeral.tb_uf                    uf,
        dbgeral.tb_municipio             munic,
        dbcnes.tb_dados_profissional_sus p
        where e.co_unidade = ch.co_unidade
        and ch.co_profissional_sus = p.co_profissional_sus
        and e.co_estado_gestor = uf.co_uf_ibge
        and e.co_municipio_gestor = munic.co_municipio_ibge
        ";
        $query_estabelecimento .= "and p.co_profissional_sus = '".$_GET['nu']."'";
        // $query .= "and p.co_profissional_sus = '".$_POST['co_profissional_sus']."'";
        $query_estabelecimento .= "order by e.no_razao_social";

        //incluindo objeto do estabelecimento
        $estabelecimento = oci_parse(Busca_medicoViewResultado::conn(), $query_estabelecimento);
        oci_execute($estabelecimento);
        $this->estabelecimento = array();
        while ($row = oci_fetch_assoc($estabelecimento)) {
            // $this->item['uc'][] = $row['SG_UF'];
            $this->estabelecimento[] = $row;
        }
        return true;
    }
    /**
     * Display the view
     */
    public function grafico($tpl = null) {

        $query_total_partos = "
        SELECT AIH.NU_MED_RESP_DOC,
        SUM(CASE WHEN (CO_PROC_REALIZADO IN ('0310010039','0310010047','0310010055','0411010026','0411010034','0411010042')) THEN 1 ELSE 0 END) TotGeral,
        -- Normal 2011/2014
        SUM(CASE WHEN (CO_PROC_REALIZADO IN ('0310010039','0310010047','0310010055')) THEN 1 ELSE 0 END) TotNormal,
        -- Cesária 2011/2014
        SUM(CASE WHEN (CO_PROC_REALIZADO IN ('0411010026','0411010034','0411010042')) THEN 1 ELSE 0 END) TotCesaria
        FROM DBAIH.TB_AIH AIH
        ";
        $query_total_partos .="WHERE AIH.NU_MED_RESP_DOC = '".$_GET['nu']."'";
        $query_total_partos .="GROUP BY AIH.NU_MED_RESP_DOC";
        /*echo "<pre>";
        print_r($query_por_ano);
        echo "</pre>";*/
        $parto_total = oci_parse(Busca_medicoViewResultado::conn(), $query_total_partos);
            oci_execute($parto_total);
            $this->parto_total = array();
            while ($row = oci_fetch_assoc($parto_total)) {
                        // $this->item['uc'][] = $row['SG_UF'];
                $this->parto_total[] = $row;
            }

        $query_por_ano = "
        -- Partos ANO 2011/2012/2013/2014
        SELECT AIH.NU_MED_RESP_DOC,
        -- Normal 2011/2014
        SUM(CASE WHEN (CO_PROC_REALIZADO IN ('0310010039','0310010047','0310010055') AND SUBSTR(AIH.DT_INTERNACAO,1,4) = '2011') THEN 1 ELSE 0 END) N2011,
        SUM(CASE WHEN (CO_PROC_REALIZADO IN ('0310010039','0310010047','0310010055') AND SUBSTR(AIH.DT_INTERNACAO,1,4) = '2012') THEN 1 ELSE 0 END) N2012,
        SUM(CASE WHEN (CO_PROC_REALIZADO IN ('0310010039','0310010047','0310010055') AND SUBSTR(AIH.DT_INTERNACAO,1,4) = '2013') THEN 1 ELSE 0 END) N2013,
        SUM(CASE WHEN (CO_PROC_REALIZADO IN ('0310010039','0310010047','0310010055') AND SUBSTR(AIH.DT_INTERNACAO,1,4) = '2014') THEN 1 ELSE 0 END) N2014,
        -- Cesária 2011/2014
        SUM(CASE WHEN (CO_PROC_REALIZADO IN ('0411010026','0411010034','0411010042') AND SUBSTR(AIH.DT_INTERNACAO,1,4) = '2011') THEN 1 ELSE 0 END) C2011,
        SUM(CASE WHEN (CO_PROC_REALIZADO IN ('0411010026','0411010034','0411010042') AND SUBSTR(AIH.DT_INTERNACAO,1,4) = '2012') THEN 1 ELSE 0 END) C2012,
        SUM(CASE WHEN (CO_PROC_REALIZADO IN ('0411010026','0411010034','0411010042') AND SUBSTR(AIH.DT_INTERNACAO,1,4) = '2013') THEN 1 ELSE 0 END) C2013,
        SUM(CASE WHEN (CO_PROC_REALIZADO IN ('0411010026','0411010034','0411010042') AND SUBSTR(AIH.DT_INTERNACAO,1,4) = '2014') THEN 1 ELSE 0 END) C2014
        FROM DBAIH.TB_AIH AIH
        ";
        $query_por_ano .="WHERE AIH.NU_MED_RESP_DOC = '".$_GET['nu']."'";
        $query_por_ano .="GROUP BY AIH.NU_MED_RESP_DOC";
        /*echo "<pre>";
        print_r($query_por_ano);
        echo "</pre>";*/
        $parto_por_ano = oci_parse(Busca_medicoViewResultado::conn(), $query_por_ano);
            oci_execute($parto_por_ano);
            $this->parto_por_ano = array();
            while ($row = oci_fetch_assoc($parto_por_ano)) {
                        // $this->item['uc'][] = $row['SG_UF'];
                $this->parto_por_ano[] = $row;
            }

        // $query_normal ="
        // select count(t2.co_seq) as qtd_parto_normal
        // from dbaih.TB_AIH t2
        // where t2.nu_med_resp_doc = 980016001020537
        // and t2.co_proc_realizado in (0310010039, 0310010047, 0310010055)
        // ";
        // $parto_normal = oci_parse(Busca_medicoViewResultado::conn(), $query_normal);
        // oci_execute($parto_normal);
        // $this->parto_normal = array();
        // while ($row = oci_fetch_assoc($parto_normal)) {
        //     // $this->item['uc'][] = $row['SG_UF'];
        //     $this->parto_normal[] = $row;
        // }

        // $query_cesaria="
        // select count(t3.co_seq) as qtd_parto_cesaria
        // from dbaih.TB_AIH t3
        // where t3.nu_med_resp_doc = 980016001020537
        // and t3.co_proc_realizado in (0411010026, 0411010034, 0411010042)
        // ";
        // $parto_cesaria = oci_parse(Busca_medicoViewResultado::conn(), $query_cesaria);
        // oci_execute($parto_cesaria);
        // $this->parto_cesaria = array();
        // while ($row = oci_fetch_assoc($parto_cesaria)) {
        //     // $this->item['uc'][] = $row['SG_UF'];
        //     $this->parto_cesaria[] = $row;
        // }

        // $query_ano="
        // select (select count(t1.co_seq)
        // from dbaih.TB_AIH t1
        // where t1.nu_med_resp_doc = 980016001020537
        // and (t1.dt_internacao between '20120101' and '20121231')
        // and t1.co_proc_realizado in (0310010039, 0310010047, 0310010055)) N2012,
        // (select count(t2.co_seq)
        // from dbaih.TB_AIH t2
        // where t2.nu_med_resp_doc = 980016001020537
        // and (t2.dt_internacao between '20130101' and '20131231')
        // and t2.co_proc_realizado in (0310010039, 0310010047, 0310010055)) N2013,
        // (select count(t3.co_seq)
        // from dbaih.TB_AIH t3
        // where t3.nu_med_resp_doc = 980016001020537
        // and (t3.dt_internacao between '20140101' and '20141231')
        // and t3.co_proc_realizado in (0310010039, 0310010047, 0310010055)) N2014,
        // (select count(t1.co_seq)
        // from dbaih.TB_AIH t1
        // where t1.nu_med_resp_doc = 980016001020537
        // and (t1.dt_internacao between '20120101' and '20121231')
        // and t1.co_proc_realizado in (0411010026, 0411010034, 0411010042)) C2012,
        // (select count(t2.co_seq)
        // from dbaih.TB_AIH t2
        // where t2.nu_med_resp_doc = 980016001020537
        // and (t2.dt_internacao between '20130101' and '20131231')
        // and t2.co_proc_realizado in (0411010026, 0411010034, 0411010042)) C2013,
        // (select count(t3.co_seq)
        // from dbaih.TB_AIH t3
        // where t3.nu_med_resp_doc = 980016001020537
        // and (t3.dt_internacao between '20140101' and '20141231')
        // and t3.co_proc_realizado in (0411010026, 0411010034, 0411010042)) C2014
        // from dual
        //     ";

        //     $parto_ano = oci_parse(Busca_medicoViewResultado::conn(), $query_ano);
        //     oci_execute($parto_ano);
        //     $this->parto_ano = array();
        //     while ($row = oci_fetch_assoc($parto_ano)) {
        //                 // $this->item['uc'][] = $row['SG_UF'];
        //         $this->parto_ano[] = $row;
        //     }


return true;
}
    /**
     * Display the view
     */
    public function display($tpl = null) {

        $s = oci_parse(Busca_medicoViewResultado::conn(), Busca_medicoViewResultado::query());
        oci_execute($s);
        $this->item = array();
        while ($row = oci_fetch_assoc($s)) {
            // $this->item['uc'][] = $row['SG_UF'];
            $this->item[] = $row;
        }


        $app = JFactory::getApplication();
        $user = JFactory::getUser();

        $this->state = $this->get('State');
        
        $this->params = $app->getParams('com_busca_medico');

        if (!empty($this->item)) {

        }


        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        

        if ($this->_layout == 'edit') {

            $authorised = $user->authorise('core.create', 'com_busca_medico');

            if ($authorised !== true) {
                throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
            }
        }
        Busca_medicoViewResultado::estabelecimento();
        Busca_medicoViewResultado::grafico();
        $this->_prepareDocument();

        parent::display($tpl);
    }

    /**
     * Prepares the document
     */
    protected function _prepareDocument() {
        $app = JFactory::getApplication();
        $menus = $app->getMenu();
        $title = null;

        // Because the application sets a default page title,
        // we need to get it from the menu item itself
        $menu = $menus->getActive();
        if ($menu) {
            $this->params->def('page_heading', $this->params->get('page_title', $menu->title));
        } else {
            $this->params->def('page_heading', JText::_('COM_BUSCA_MEDICO_DEFAULT_PAGE_TITLE'));
        }
        $title = $this->params->get('page_title', '');
        if (empty($title)) {
            $title = $app->getCfg('sitename');
        } elseif ($app->getCfg('sitename_pagetitles', 0) == 1) {
            $title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
        } elseif ($app->getCfg('sitename_pagetitles', 0) == 2) {
            $title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
        }
        $this->document->setTitle($title);

        if ($this->params->get('menu-meta_description')) {
            $this->document->setDescription($this->params->get('menu-meta_description'));
        }

        if ($this->params->get('menu-meta_keywords')) {
            $this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
        }

        if ($this->params->get('robots')) {
            $this->document->setMetadata('robots', $this->params->get('robots'));
        }
    }

}
