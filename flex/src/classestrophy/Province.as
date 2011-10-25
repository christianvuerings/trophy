package classestrophy
{
    [RemoteClass(alias="classestrophy.Province")]
    public class Province
    {		
        private var provinceId:Number;
        private var label:String;
        private var countryId:Number;
    
    	public function get provinceId() {
		return $this.provinceId;
	    }

    	public function get label() {
		return $this.label;
	    }

    	public function get countryId() {
		return $this.countryId;
	    }

    
        public function set provinceId(provinceId:Number) {
		$this.provinceId = $provinceId;
	    }

        public function set label(label:String) {
		$this.label = $label;
	    }

        public function set countryId(countryId:Number) {
		$this.countryId = $countryId;
	    }

    }