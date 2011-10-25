package classestrophy
{
    [RemoteClass(alias="classestrophy.Languages")]
    public class Languages
    {		
        private var languagesId:Number;
        private var label:String;
    
    	public function get languagesId() {
		return $this.languagesId;
	    }

    	public function get label() {
		return $this.label;
	    }

    
        public function set languagesId(languagesId:Number) {
		$this.languagesId = $languagesId;
	    }

        public function set label(label:String) {
		$this.label = $label;
	    }

    }