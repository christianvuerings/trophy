package classestrophy
{
    [RemoteClass(alias="classestrophy.Language")]
    public class Language
    {
	    private var _languageId:String;
	    private var _label:String;

	    // Getters
	    public function get languageId():String {
		    return this._languageId;
	    }
	    public function get label():String {
		    return this._label;
	    }

	    // Setters
	    public function set languageId(languageId:String):void {
		    this._languageId = languageId;
	    }
	    public function set label(label:String):void {
		    this._label = label;
	    }
    }
}