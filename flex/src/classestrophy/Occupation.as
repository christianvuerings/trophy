package classestrophy
{
    [RemoteClass(alias="classestrophy.Occupation")]
    public class Occupation
    {		
        private var occupationId:Number;
        private var label:String;
    
    	public function get occupationId() {
		return $this.occupationId;
	    }

    	public function get label() {
		return $this.label;
	    }

    
        public function set occupationId(occupationId:Number) {
		$this.occupationId = $occupationId;
	    }

        public function set label(label:String) {
		$this.label = $label;
	    }

    }