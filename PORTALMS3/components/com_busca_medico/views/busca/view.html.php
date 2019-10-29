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
class Busca_medicoViewBusca extends JViewLegacy {

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
            //conexão de produção
            // $ora_bd = "(DESCRIPTION=
            //           (ADDRESS_LIST=
            //             (ADDRESS=(PROTOCOL=TCP) 
            //               (HOST=srvoradf20-scan.saude.gov)(PORT=1521)
            //             )
            //           )
            //           (CONNECT_DATA=(SERVICE_NAME=DFPO1.SAUDE.GOV))
            //      )";
            //Nesta linha fazemos a conexão com o banco usando os variáveis preenchidas 
            //anterior mente, logo em seguida fazemos uma verificação, se a conexão ocorreu 
            //com sucesso, será impresso na tela uma mensagem avisando nos de tal,
            //caso não, ele imprimirá na tela uma mensagem avisando que houve um erro
    if ($ora_conexao = oci_connect($ora_user,$ora_senha,$ora_bd) ){

                // echo "Conexão bem sucedida. Usuário conectado: ora_user"; 
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
        // var_dump($_POST); die;
        $query = "
SELECT ROWNUM + (30 * (PAGINA - 1)) AS \"ROWNUM\",
       (TRUNC(TOTALREG / 30) + 1) AS \"TOTALPAG\",
       B.*
  FROM (SELECT COUNT(*) OVER() AS TOTALREG,
               TRUNC((ROW_NUMBER() OVER(ORDER BY MUNICIPIO,NOMEPROFISSIONAL) - 1) / 30) + 1 AS PAGINA,
               TMP.*
          FROM (
-- Médicos % Partos:
( WITH MEDICO AS
    (SELECT * FROM 
        (SELECT DISTINCT P.CO_PROFISSIONAL_SUS AS CODIGOSUS,
                P.CO_CPF AS CPF,
               P.NO_PROFISSIONAL AS NOMEPROFISSIONAL,
                P.CO_CNS AS CODIGOCNS,
                E.CO_ESTADO_GESTOR AS CODIGOUF,
                MUNIC.SG_UF AS SG_UF,
                E.CO_MUNICIPIO_GESTOR AS CODIGOMUNICIPIO,
                MUNIC.NO_MUNICIPIO AS MUNICIPIO,
                'CRM-' || CH.NU_REGISTRO || '-' ||
                NVL(P.CO_SIGLA_ESTADO_RES, '--') AS NUMEROREGISTROFORMATADO
         FROM  DBCNES.TB_ESTABELECIMENTO        E,
               DBCNES.TB_CARGA_HORARIA_SUS      CH,
       --      DBGERAL.TB_UF                    UF,  -- não é necessário acesso a essa tabela
               DBGERAL.TB_MUNICIPIO             MUNIC,
               DBCNES.TB_DADOS_PROFISSIONAL_SUS P
         WHERE E.CO_UNIDADE = CH.CO_UNIDADE
         AND   E.CO_MOTIVO_DESAB IS NULL
       --AND   (CH.CO_CBO LIKE '225%' OR CH.CO_CBO LIKE '2231%') -- PARA TODOS OS MÉDICOS BRASIL;
         AND   (CH.CO_CBO = '223132' OR CH.CO_CBO = '225250') -- APENAS MÉDICO GINECOLOGISTA E OBSTETRA
         AND   CH.CO_PROFISSIONAL_SUS = P.CO_PROFISSIONAL_SUS
         AND E.CO_ESTADO_GESTOR = MUNIC.CO_UF_IBGE
         AND E.CO_MUNICIPIO_GESTOR = MUNIC.CO_MUNICIPIO_IBGE
       --AND CH.ST_REGISTRO_ATIVO = 'S'
       ";
       $query .= "and MUNIC.co_uf_ibge = '".$_GET['cod_estados']."'
             ";
            // codigo do estado
            if ($_GET['cod_cidades']) {
                $query .= "and munic.co_municipio_ibge = '".$_GET['cod_cidades']."'
                ";
            }
            if ($_GET['crm']) {
                $query .= "and ch.nu_registro = '".$_GET['crm']."'";
            }
       $query .= "
       )
) 
 SELECT MEDICO.*,
        SUM(CASE WHEN (CO_PROC_REALIZADO IN ('0310010039','0310010047','0310010055',
                                             '0411010026','0411010034','0411010042'))  THEN 1 ELSE 0 END) TOTGERAL,
        SUM(CASE WHEN (CO_PROC_REALIZADO IN('0310010039', '0310010047', '0310010055')) THEN 1 ELSE 0 END) TOTNORMAL,
        SUM(CASE WHEN (CO_PROC_REALIZADO IN('0411010026', '0411010034', '0411010042')) THEN 1 ELSE 0 END) TOTCESARIA
FROM   DBAIH.TB_AIH AIH, MEDICO
WHERE  AIH.NU_MED_RESP_DOC (+)= MEDICO.CODIGOCNS
GROUP  BY CODIGOSUS,CPF,NOMEPROFISSIONAL,CODIGOCNS,CODIGOUF,SG_UF,CODIGOMUNICIPIO,MUNICIPIO,NUMEROREGISTROFORMATADO
ORDER BY MUNICIPIO,NOMEPROFISSIONAL )
          ) TMP
        
        ) B
            ";
            if (isset($_GET['currentpage'])) {
            $query .="WHERE PAGINA = ".$_GET['currentpage']."";
        } else{
            $query .="WHERE PAGINA = 1";
        }
            // $query .="
            // )
            // ) 
            // SELECT MEDICO.*,
            // SUM(CASE WHEN (CO_PROC_REALIZADO IN ('0310010039','0310010047','0310010055',
            //    '0411010026','0411010034','0411010042'))  THEN 1 ELSE 0 END) TOTGERAL,
            // SUM(CASE WHEN (CO_PROC_REALIZADO IN('0310010039', '0310010047', '0310010055')) THEN 1 ELSE 0 END) TOTNORMAL,
            // SUM(CASE WHEN (CO_PROC_REALIZADO IN('0411010026', '0411010034', '0411010042')) THEN 1 ELSE 0 END) TOTCESARIA
            // FROM   DBAIH.TB_AIH AIH, MEDICO
            // WHERE  AIH.NU_MED_RESP_DOC (+)= MEDICO.CODIGOCNS
            // GROUP  BY CODIGOSUS,CPF,NOMEPROFISSIONAL,CODIGOCNS,CODIGOUF,UF,CODIGOMUNICIPIO,MUNICIPIO,NUMEROREGISTROFORMATADO
            // ORDER BY MUNICIPIO,NOMEPROFISSIONAL )
            // ) TMP
            // ";
            // and uf.co_uf_ibge = '11'
            // --and munic.co_municipio_ibge = '110020'
            // --and ch.nu_registro = '2193'
            // order by e.co_municipio_gestor, p.no_profissional) TMP
        

        // $query .="
        // ) B
        // ";
        // if (isset($_GET['currentpage'])) {
        //     $query .="WHERE PAGINA = ".$_GET['currentpage']."";
        // } else{
        //     $query .="WHERE PAGINA = 1";
        // }

        /*echo "<pre>";
        print_r($query);
        echo "</pre>";*/
        return $query;
    }
    // /**
    //  * Display the view
    //  */
    // public function teste($tpl = null) {
    //     $s = oci_parse(Busca_medicoViewBusca::conn(), Busca_medicoViewBusca::query());
    //     oci_execute($s);
    //     $this->item = array();
    //     while ($row = oci_fetch_assoc($s)) {
    //         // $this->item['uc'][] = $row['SG_UF'];
    //         $this->item[] = $row;
    //     }
    // }
    /**
     * Display the view
     */
    public function display($tpl = null) {
        jimport('joomla.html.pagination');

        $s = oci_parse(Busca_medicoViewBusca::conn(), Busca_medicoViewBusca::query());
        oci_execute($s);
        $this->item = array();
        while ($row = oci_fetch_assoc($s)) {
            // $this->item['uc'][] = $row['SG_UF'];
            $this->item[] = $row;
        }
        $app = JFactory::getApplication();
        $user = JFactory::getUser();
        // $pagination = $this->get('Pagination');
        // $limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'));
        // $this->setState('list.limit', $limit);

        // $limitstart = JRequest::getVar('limitstart', 0, '', 'int');
        // $this->setState('list.start', $limitstart);
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
        // $this->pagination = $pagination;
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
