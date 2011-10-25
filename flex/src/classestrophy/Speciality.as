package classestrophy
{
    [RemoteClass(alias="classestrophy.Speciality")]
    public class Speciality
    {		
        private var specialityId:Number;
        private var label:String;
    
    	public function get specialityId() {
		return $this.specialityId;
	    }

    	public function get label() {
		return $this.label;
	    }

    
        public function set specialityId(specialityId:Number) {
		$this.specialityId = $specialityId;
	    }

        public function set label(label:String) {
		$this.label = $label;
	    }

    }