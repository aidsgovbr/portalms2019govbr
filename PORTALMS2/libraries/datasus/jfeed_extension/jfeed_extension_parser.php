<?php

class JFeedExtensionParser extends JFeedParser
{


	protected function initialise()
	{
		return;
	}

	public function parse($maxelements = 0)
	{
		$feed = new JFeed;
		$count = 0;

		// Detect the feed version.
		$this->initialise();

		// Let's get this party started...
		do
		{
			// Expand the element for processing.
			$el = new SimpleXMLElement($this->stream->readOuterXml());

			// Get the list of namespaces used within this element.
			$ns = $el->getNamespaces(true);

			// Get an array of available namespace objects for the element.
			$namespaces = array();

			foreach ($ns as $prefix => $uri)
			{
				// Ignore the empty namespace prefix.
				if (empty($prefix))
				{
					continue;
				}

				// Get the necessary namespace objects for the element.
				$namespace = $this->fetchNamespace($prefix);

				if ($namespace)
				{
					$namespaces[] = $namespace;
				}
			}

			// Process the element.
			$this->processElement($feed, $el, $namespaces);

			// Skip over this element's children since it has been processed.
			$this->moveToClosingElement();

			//Process only the elements desired
			if ($el->getName() == $this->entryElementName)
				$count++;
		}
		while ( ( ($maxelements && $count < $maxelements) && $this->moveToNextElement() ) || (! $maxelements && $this->moveToNextElement() ) );

		return $feed;
	}
}