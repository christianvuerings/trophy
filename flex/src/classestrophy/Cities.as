package classestrophy
{
    [RemoteClass(alias="classestrophy.Cities")]
    public class Cities
    {		
        private var citiesId:Number;
        private var provincesId:Number;
        private var zipcode:String;
        private var name:String;
    
    	public function get citiesId() {
		return $this.citiesId;
	    }

    	public function get provincesId() {
		return $this.provincesId;
	    }

    	public function get zipcode() {
		return $this.zipcode;
	    }

    	public function get name() {
		return $this.name;
	    }

    
        public function set citiesId(citiesId:Number) {
		$this.citiesId = $citiesId;
	    }

        public function set provincesId(provincesId:Number) {
		$this.provincesId = $provincesId;
	    }

        public function set zipcode(zipcode:String) {
		$this.zipcode = $zipcode;
	    }

        public function set name(name:String) {
		$this.name = $name;
	    }

    }