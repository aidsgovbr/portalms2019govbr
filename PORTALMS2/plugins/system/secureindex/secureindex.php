<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.secureindex
 *
 * @copyright   Copyright (C) 2013 Renington Neri, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

/**
 * SecureIndex Plugin
 *
 * @package     Joomla.Plugin
 * @subpackage  System.secureindex
 * @since       3.x
 */
class PlgSystemSecureindex extends JPlugin
{
	/**
	 * If directory empty; add the file index.html
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	private $log = array();

	function onAfterInitialise()
	{
		$this->rastreio(JPATH_ROOT);

		if($this->log)
			var_dump($this->log);
		else
			echo 'Todos os diret&oacute;rios verificados';

		$this->despublicaPlugin('secureindex');
	}


	function rastreio($diretorio){
		$arquivos = scandir($diretorio);

		foreach ($arquivos as $key => $arquivo){
			if ($arquivo == '..' || $arquivo == '.'){
				unset($arquivos[$key]);
				continue;
			}

			$diretorioAtual = $diretorio."\\".$arquivo;

			if(is_dir($diretorioAtual)){
				$nomeDiretorio = $arquivo;
				$arquivo = array($nomeDiretorio);
				$arquivo[] = $this->rastreio($diretorioAtual);
				unset ($arquivos[$key]);
				$arquivos[$key] = $arquivo;
			}
		}

		if(array_search('index.html',$arquivos)==null){
			if(array_search('index.php',$arquivos)==null){
				$diretorioRaiz = JPATH_ROOT.'\plugins\system\secureindex\index.html';
				copy($diretorioRaiz,"$diretorio\index.html");
				$this->log[] = $diretorio;
			}
		}
		return $arquivos;
	}

	private function despublicaPlugin($plugin){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true)
		->update($db->quoteName('#__extensions' ))
		->set($db->quoteName('enabled') . ' = ' . $db->quote(0))
		->where('element = ' . $db->quote($plugin));
		$db->setQuery($query);

		try
		{
			$db->execute();
		}
		catch (RuntimeException $e)
		{
			JError::raiseWarning(500, $db->getMessage());
			return false;
		}
	}
}