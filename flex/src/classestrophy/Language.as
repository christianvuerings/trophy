package classestrophy
{
    [RemoteClass(alias="classestrophy.Language")]
    public class Language
    {		
        private var languageId:Number;
        private var label:String;
    
    	public function get languageId() {
		return $this.languageId;
	    }

    	public function get label() {
		return $this.label;
	    }

    
        public function set languageId(languageId:Number) {
		$this.languageId = $languageId;
	    }

        public function set label(label:String) {
		$this.label = $label;
	    }

    }