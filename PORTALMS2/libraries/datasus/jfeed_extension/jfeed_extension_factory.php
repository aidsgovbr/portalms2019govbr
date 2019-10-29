<?php


require_once('jfeed_extension_parser.php');
require_once('parser/rss.php');
require_once('parser/atom.php');


class JFeedExtensionFactory extends JFeedFactory
{
	public function getFeed($uri, $maxelements = 0)
	{
		$jconfig = new JCONFIG;
		
		// Create the XMLReader object.
		$reader = new XMLReader;

		// Open the URI within the stream reader.
		if (!$reader->open($uri, null, LIBXML_NOERROR | LIBXML_ERR_NONE | LIBXML_NOWARNING))
		{
			throw new RuntimeException('Unable to open the feed.');
		}

		try
		{
			// Skip ahead to the root node.
			do
			{
				$reader->read();
			}
			while ($reader->nodeType !== XMLReader::ELEMENT);
		}
		catch (Exception $e)
		{
			if(isset($jconfig->custom_debug) && $jconfig->custom_debug)
				throw new RuntimeException('Unable to open the feed.');
		}

		// Setup the appopriate feed parser for the feed.
		$parser = $this->_fetchFeedParser($reader->name, $reader);

		return $parser->parse($maxelements);
	}

	private function _fetchFeedParser($type, XMLReader $reader)
	{
		// Look for a registered parser for the feed type.
		if (empty($this->parsers[$type]))
		{
			if(isset($jconfig->custom_debug) && $jconfig->custom_debug)
				throw new LogicException('No registered feed parser for type ' . $type . '.');
		}

		$extended_class = $this->parsers[$type].'Extension';

		if(!class_exists($extended_class))
			return new $this->parsers[$type];

		return new $extended_class($reader);
	}
}