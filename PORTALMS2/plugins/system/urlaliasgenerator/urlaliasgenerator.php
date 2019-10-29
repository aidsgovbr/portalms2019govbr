<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.Urlaliasgenerator
 *
 * @author      Tiago Garcia <tiago@gmail.com>
 * @copyright   Copyright (C) 2014 TiagoGarcia, Inc. All rights reserved.
 * @license
 */

// No direct access.
defined('_JEXEC') or die;

set_time_limit(300);

/**
 * Joomla UrlAliasGenerator plugin.
 *
 * @package     Joomla.Plugin
 * @subpackage  System.UrlAliasGenerator
 * @author      Tiago Garcia <tiago@gmail.com>
 * @since       3.x.x
 */

class PlgSystemUrlAliasGenerator extends JPlugin {

	function onAfterInitialise() {

		$app = JFactory::getApplication();

		if ($app->isAdmin()) {
			if ($this->params->get('encurtada') == 1) {
				$this->atualizaEncurtada();
			}
			if ($this->params->get('alias') == 1) {
				$this->atualizaArtigos();
			}
			if ($this->params->get('assetComponente') == 1) {
				$this->atualizaAssetsComponent();
			}
			if ($this->params->get('assetArtigos') == 1) {
				$this->atualizaAssetsArtigos();
			}
			if ($this->params->get('assetModulos') == 1) {
				$this->atualizaAssetsModulos();
			}
			$this->despublicaPlugin('urlaliasgenerator');
		}
	}

	const QTD_VALUE = 100;

	private function selecionaArtigos($qtd) {

		$db = JFactory::getDbo();
		$query = $db->getQuery(true)
		->select($db->quoteName('id'))
		->select($db->quoteName('title'))
		->select($db->quoteName('alias'))
		->select($db->quoteName('catid'))
		->select($db->quoteName('urls'))
		->from($db->quoteName('#__' . $this->params->get('tabela')));

		$db->setQuery($query, $qtd, self::QTD_VALUE);

		// toda tabela de artigos, de 100 em 100.
		$models = $db->loadObjectList();
		return $models;
	}

	private function selecionaArtigosAssets($qtd) {

		$db = JFactory::getDbo();
		$query = $db->getQuery(true)
		->select('*')
		->from('#__content');
		// ->where('asset_id = 0');

		$db->setQuery($query, $qtd, self::QTD_VALUE);

		$models = $db->loadObjectList();
		return $models;
	}

	private function selecionaModulesAssets($qtd) {

		$db = JFactory::getDbo();
		$query = $db->getQuery(true)
		->select('*')
		->from('#__modules');
		// ->where('asset_id = 0');

		$db->setQuery($query, $qtd, self::QTD_VALUE);

		$models = $db->loadObjectList();
		return $models;
	}


	private function atualizaAssetsComponent() {
		jimport( 'joomla.table.table' );
		JTable::addIncludePath(JPATH_PLATFORM . 'joomla/database/table');
		$count = 0;
		$count3 = 0;

		// assets dos componentes
		$newComponents =  $this->getComponents();
		foreach ($newComponents as $component) {
			$asset = JTable::getInstance('Asset');

			if (!$asset->loadByName($component->name))
			{
				$asset->name = $component->name;
				$asset->parent_id = 1;
				$asset->rules = '{}';
				$asset->title = $component->name;
				$asset->setLocation(1, 'last-child');

				if (!$asset->store())
				{
					// Install failed, roll back changes
					$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_COMP_INSTALL_ROLLBACK', $db->stderr(true)));
					return false;
				}
				$count ++;
				JError::raiseNotice(403, $count .' Assets atualizados');
			}
			$count3 ++;
		}
		JError::raiseNotice(403, $count . ' Assets de componentes atualizados Em '.$count3.' Linhas verificadas.');
	}

	private function atualizaAssetsArtigos() {
		jimport( 'joomla.table.table' );
		JTable::addIncludePath(JPATH_PLATFORM . 'joomla/database/table');
		$article = JTable::getInstance('content');
		$qtd = 0;		$count = 0;		$count3 = 0;

		// assets dos artigos
		while (true) {
			$articles = $this->selecionaArtigosAssets($qtd);

			if (count($articles) != 0) {
				$qtd = $qtd + self::QTD_VALUE;
				$count3 = $count3 + 100;

				foreach ($articles as $article) {
					$asset = JTable::getInstance('Asset');

					// atualiza assets
					if (!$asset->loadByName('com_content.article.'.$article->id)) {

						$asset->name = 'com_content.article.'.$article->id;
						$asset->parent_id = 8;
						$asset->rules = '{"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1}}';
						$asset->title = $article->title;
						$asset->setLocation(1, 'last-child');

						if (!$asset->store())
						{
							$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_COMP_INSTALL_ROLLBACK', $db->stderr(true)));
							return false;
						}
						$count ++;

					}else{
						// atualzia o asset do artigo.
						if ($article->asset_id == 0 ) {
							$db = JFactory::getDbo();
							$query = $db->getQuery(true)
							->update($db->quoteName('#__content'))
							->set($db->quoteName('asset_id') . ' = ' . $db->quote($asset->id))
							->where('id = ' . (int) $article->id);
							$db->setQuery($query);

							try
							{
								$count ++;
								$db->execute();
							}
							catch (RuntimeException $e)
							{
								JError::raiseWarning(500, $db->getMessage());
								return false;
							}
						}
					}
				}
			} else {
				JError::raiseNotice(403, $count . ' Assets de artigos atualizados Em '.$count3.' Linhas verificadas.');
				return false;
			}
		}
	}

	private function atualizaAssetsModulos() {
		jimport( 'joomla.table.table' );
		JTable::addIncludePath(JPATH_PLATFORM . 'joomla/database/table');
		$article = JTable::getInstance('content');
		$qtd = 0;		$count = 0;		$count2 = 0;	$count4 = 0;

		// assets dos modulos
		while (true) {
			$modules = $this->selecionaModulesAssets($qtd);

			if (count($modules) != 0) {
				$qtd = $qtd + self::QTD_VALUE;
				$count4 = $count4 + 100;

				foreach ($modules as $module) {
					$asset = JTable::getInstance('Asset');
					// atualiza assets
					if (!$asset->loadByName('com_modules.module.'.$module->id)) {

						$asset->name = 'com_modules.module.'.$module->id;
						$asset->parent_id = 8;
						$asset->rules = '{"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1}}';
						$asset->title = $module->title;
						$asset->setLocation(1, 'last-child');

						if (!$asset->store())
						{
							$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_COMP_INSTALL_ROLLBACK', $db->stderr(true)));
							return false;
						}
						$count ++;

					}else{
						// atualzia o asset do modulo.
						if ($module->asset_id == 0 ) {
							$db = JFactory::getDbo();
							$query = $db->getQuery(true)
							->update($db->quoteName('#__modules'))
							->set($db->quoteName('asset_id') . ' = ' . $db->quote($asset->id))
							->where('id = ' . (int) $module->id);
							$db->setQuery($query);

							try
							{
								$count2 ++;
								$db->execute();
							}
							catch (RuntimeException $e)
							{
								JError::raiseWarning(500, $db->getMessage());
								return false;
							}
						}
					}
				}
			} else {
				JError::raiseNotice(403, $count2 . ' Assets de artigos atualizados Em '.$count4.' Linhas verificadas.');
				return false;
			}
		}
	}


	private function atualizaArtigos() {
		jimport( 'joomla.filter.output' );
		$qtd = 0;
		$count = 0;
		$count2 = 0;
		$count3 = 0;

		while (true) {

			$models = $this->selecionaArtigos($qtd);

			if (count($models) != 0) {
				$qtd = $qtd + self::QTD_VALUE;
				$count3 = $count3 + 100;

				if ($this->params->get('alias') == 1) {
					// verifica nomes errados, vazios
					foreach ($models as $model)	{

						$aux = $model->alias;
						$model->alias = JFilterOutput::stringURLSafe($model->title);

						//verify if alias exists and is correct
						if ($aux != $model->alias) {

							$db = JFactory::getDbo();
							$query = $db->getQuery(true)
							->update($db->quoteName('#__' . $this->params->get('tabela')))
							->set($db->quoteName('alias') . ' = ' . $db->quote($model->alias))
							->where('id = ' . (int) $model->id);
							$db->setQuery($query);

							try
							{
								$count ++;
								$db->execute();
							}
							catch (RuntimeException $e)
							{
								JError::raiseWarning(500, $db->getMessage());
								return false;
							}
						}
					}

					// verifica duplicata
					foreach ($models as $model)	{
						$table = JTable::getInstance('Content', 'JTable');

						// Verify that the alias is unique
						if ($table->load(array('alias' => $model->alias, 'catid' => $model->catid)) && ($table->id != $model->id))
						{
							$model->alias = $model->id .'-'. $model->alias;
							$model->title = $model->id .'-'. $model->title;

							$db = JFactory::getDbo();
							$query = $db->getQuery(true)
							->update($db->quoteName('#__' . $this->params->get('tabela')))
							->set($db->quoteName('alias') . ' = ' . $db->quote($model->alias))
							->set($db->quoteName('title') . ' = ' . $db->quote($model->title))
							->where('id = ' . (int) $model->id);
							$db->setQuery($query);

							try
							{
								$count2 ++;
								$db->execute();
							}
							catch (RuntimeException $e)
							{
								JError::raiseWarning(500, $db->getMessage());
								return false;
							}
						}
					}
				}// fim alias.
			}
			else{
				JError::raiseNotice(403, $count .' Atualizados' .' e '. $count2 . ' Duplicadas encontradas. Em '.$count3.' Linhas verificadas.');
				return false;
			}
		}
	}



	private function atualizaEncurtada() {
		jimport( 'joomla.filter.output' );

		if ($this->params->get('qtd') != 0) {
			$qtd = $this->params->get('qtd');
		}else{
			$qtd = 0;
		}
		$count = 0;
		$count2 = 0;
		$count3 = 0;

		// limpar tabela?
		if ($this->params->get('limpar_tabela') == 1) {
			// limpa tabela de encurtadas
			$db1 = JFactory::getDbo();
			$db1->truncateTable('#__shortener');
			try
			{
				$db1->execute();
			}
			catch (RuntimeException $e)
			{
				JError::raiseWarning(500, $db1->getErrorMsg());
				return false;
			}
		}


		while (true) {

			$models = $this->selecionaArtigos($qtd);

			if (count($models) != 0) {
				$qtd = $qtd + self::QTD_VALUE;


				if ($this->params->get('encurtada') == 1) {
					JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_shortener/models', 'ShortenerModel');
					JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_shortener/tables');

					require_once JPATH_SITE.'/components/com_content/helpers/route.php';
					require_once JPATH_ADMINISTRATOR . '/components/com_shortener/helpers/shortener.php';

					$params = JComponentHelper::getParams('com_shortener');
					$shortner = JTable::getInstance('Url', 'ShortenerTable');

					foreach ($models as $model)	{

						$encurtada = '';
						$count3 ++;

						if (!$shortner->load(array('article_id' => $model->id )) ) {

							// $link = $this::getArticleLink($model->id, $model->alias, $model->catid);
							$link = $params->get('custom_url') . '/' . $this::getArticleLink($model->id, $model->alias, $model->catid);
							$encurtada = ShortenerHelper::rand($params->get('size_url'));

							$shortModel = JModelLegacy::getInstance('Url', 'ShortenerModel', array('ignore_request' => true));

							$data  = array(
								'id'        => 0,
								'asset_id'  => 0,
								'article_id'=> $model->id,
								'short_url' => $encurtada,
								'url'       => $link,
								'state'     => 1,
								'language'  => '*',
								);

							$shortModel->save($data);

							$urls = json_decode($model->urls);

							if ($params->get('custom_url')) {
								$urls->urlctext  = $params->get('custom_url') . '/' . $encurtada;
								$urls->urlc     = $params->get('custom_url') . '/' . $encurtada;
							}else{
								$urls->urlctext  = $encurtada;
								$urls->urlc     =  JURI::root() . $encurtada;
							}

							$urls->targetc   = '';
							$model->urls = json_encode($urls);

							$db = JFactory::getDbo();
							$query = $db->getQuery(true);

							$query->clear();
							$query->update($db->quoteName('#__content'));
							$query->set($db->quoteName('urls').' = '.$db->quote($model->urls));
							$query->where($db->quoteName('id').' = '.$db->quote($model->id));

							$db->setQuery((string) $query);
							// echo $query->dump();
							// die;

							try
							{
								$count ++;
								$db->execute();
							}
							catch (RuntimeException $e)
							{
								JError::raiseWarning(500, $db->getErrorMsg());
								return false;
							}
						}
					}
				}
				// fim encurtada.
			}
			else{
				JError::raiseNotice(403, $count .' Atualizados' .' e '. $count2 . ' Duplicadas encontradas. Em '.$count3.' Linhas verificadas.');
				return false;
			}
		}
	}













	// pega a lista de components
	private function getComponents($authCheck = true)	{
		$db		= JFactory::getDbo();
		$query	= $db->getQuery(true);
		// $result	= array();

		// Prepare the query.
		$query->select('ex.element as name')
		->from('#__extensions AS ex')
		->where('ex.type = ' . $db->quote('component'));

		$query->order('name');

		$db->setQuery($query);

		// Component list
		$components	= $db->loadObjectList();

		return $components;
	}

	// despublica qualquer plugin.
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


	public function loadBy($chave, $valor, $table) {
		$db = JFactory::getDbo();
		$query = $db->getQuery(true)
		->select($db->quoteName($chave))
		->from($db->quoteName('#__'.$table))
		->where($db->quoteName($chave) . ' = ' . $db->quote($valor));
		$db->setQuery($query);
		$result = $db->loadResult();

		if (empty($result)) {
			return false;
		}

		return $result;
	}

	public function getArticleLink($id, $alias, $catid){
		$categories = JCategories::getInstance('Content');
		$category = $categories->get($catid);
		$category = $category->alias;

		$app = JApplication::getInstance('site');
		$format='';
		$index='';

		if ($app->getCfg('sef_suffix'))
		{
			if ($format = $uri->getVar('format', 'html'))
			{
				$format .= '.' . $format;
				$uri->delVar('format');
			}
		}

		if ($app->getCfg('sef_rewrite'))
		{
			$index = '';
		}
		else
		{
			$index = 'index.php/';
		}

		return $index . $category .'/'. $id .'-'. $alias . $format;
	}

}