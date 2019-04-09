<?

	/* 
	*
	* StateLocation and URL extraction
	* ---
	*
	* @author: Jan Kern
	* @version: 0.1
	*
	*/

class StateLocation{
    
    public function __construct(){

    }
    
    public static function test(){
        return 'static method test';
    }

    public static function getCurrentDomainName() {
        
        // Extract and store part of the domain name taken from url
        $domain = rex_yrewrite::getCurrentDomain();

        $domainParts = explode('.', $domain); 
        $domain = '';
        for( $i = 0; $i <= sizeof($domainParts); $i++ ) {
            if($i == sizeof($domainParts)-2){
                $domain = $domainParts[$i];
            }
        }

        $domainNameParts = explode('-', $domain);
        $domainName = ucfirst($domainNameParts[1]);
        
        return $domainName;
        
    }
    
    
    public static function getStateName(){
        
        // Define national state codes
        $nationalStates = array('Berlin'=>"BE", "Potsdam"=>"BB", "Babelsberg"=>"BB", "Roseneck"=>"BE");
        $domainName = self::getCurrentDomainName();
        
        return $nationalStates[$domainName];
        
    }
    
    public static function getLocationNameByRegion($region){
        $regions = array('berlin-brandenburg' => array('berlin', 'roseneck', 'potsdam', 'babelsberg'));
        return $regions[$region];
    }
    
}

?> 