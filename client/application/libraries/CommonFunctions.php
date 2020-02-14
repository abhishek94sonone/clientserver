<?php

class CommonFunctions
{
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function mkdir($constantName, $variables = array())
	{
		if(defined($constantName))
		{
			$fileUploadPath	= FCPATH;
			$folderPath		= explode("|", constant($constantName));

			foreach($folderPath as $value)
			{
				$fileUploadPath = $fileUploadPath.strtr($value, $variables).'/';
				if(!is_dir($fileUploadPath))
				{
					mkdir($fileUploadPath, 0777);
				}
			}
			return $fileUploadPath;
		}
		else
		{
			return '';
		}
	}

	function getDirUrl($constantName, $variables = array())
	{
		if(defined($constantName))
		{
			$fileUploadPath	= base_url();
			$folderPath		= explode("|", constant($constantName));

			foreach($folderPath as $value)
			{
				$fileUploadPath = $fileUploadPath.strtr($value, $variables).'/';
				if(!is_dir($fileUploadPath))
				{
					mkdir($fileUploadPath, 0777);
				}
			}
			return $fileUploadPath;
		}
		else
		{
			return '';
		}
	}

	function getDirFullPath($constantName, $variables = array())
	{
		if(defined($constantName))
		{
			$fileUploadPath	= FCPATH;
			$folderPath		= explode("|", constant($constantName));

			foreach($folderPath as $value)
			{
				$fileUploadPath = $fileUploadPath.strtr($value, $variables).DIRECTORY_SEPARATOR;
				if(!is_dir($fileUploadPath))
				{
					mkdir($fileUploadPath, 0777);
				}
			}
			return $fileUploadPath;
		}
		else
		{
			return '';
		}
	}
}