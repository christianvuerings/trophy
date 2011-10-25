package classestrophy
{
    [RemoteClass(alias="classestrophy.City")]
    public class City
    {		
        private var cityId:Number;
        private var provinceId:Number;
        private var zipcode:String;
        private var name:String;
    
    	public function get cityId() {
		return $this.cityId;
	    }

    	public function get provinceId() {
		return $this.provinceId;
	    }

    	public function get zipcode() {
		return $this.zipcode;
	    }

    	public function get name() {
		return $this.name;
	    }

    
        public function set cityId(cityId:Number) {
		$this.cityId = $cityId;
	    }

        public function set provinceId(provinceId:Number) {
		$this.provinceId = $provinceId;
	    }

        public function set zipcode(zipcode:String) {
		$this.zipcode = $zipcode;
	    }

        public function set name(name:String) {
		$this.name = $name;
	    }

    }