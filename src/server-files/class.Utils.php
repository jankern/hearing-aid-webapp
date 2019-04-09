<?

	/* 
	*
	* Util methods
	* ---
	*
	* @author: Jan Kern
	* @version: 0.1
	*
	*/

class Utils{
    
    public function __construct(){

    }

    public static function normalizeArticleNameForReference($articleName) {

        $name = $articleName;
        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", " -", "´", " ", "?", "&", "(", ")");
        $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue",  "ss", "", "", "-", "", "", "", "");
        $name = str_replace($search, $replace, $name);
        $name = strtolower($name);
        
        return $name;
        
    }

    
}

?> 