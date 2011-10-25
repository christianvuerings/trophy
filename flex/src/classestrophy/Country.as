package classestrophy
{
    [RemoteClass(alias="classestrophy.Country")]
    public class Country
    {		
        private var countryId:Number;
        private var label:String;
    
    	public function get countryId() {
		return $this.countryId;
	    }

    	public function get label() {
		return $this.label;
	    }

    
        public function set countryId(countryId:Number) {
		$this.countryId = $countryId;
	    }

        public function set label(label:String) {
		$this.label = $label;
	    }

    }