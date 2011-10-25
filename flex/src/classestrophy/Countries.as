package classestrophy
{
    [RemoteClass(alias="classestrophy.Countries")]
    public class Countries
    {		
        private var countriesId:Number;
        private var label:String;
    
    	public function get countriesId() {
		return $this.countriesId;
	    }

    	public function get label() {
		return $this.label;
	    }

    
        public function set countriesId(countriesId:Number) {
		$this.countriesId = $countriesId;
	    }

        public function set label(label:String) {
		$this.label = $label;
	    }

    }