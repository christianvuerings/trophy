package classestrophy
{
    [RemoteClass(alias="classestrophy.Country")]
    public class Country
    {
	    private var _countryId:String;
	    private var _label:String;

	    // Getters
	    public function get countryId():String {
		    return this._countryId;
	    }
	    public function get label():String {
		    return this._label;
	    }

	    // Setters
	    public function set countryId(countryId:String):void {
		    this._countryId = countryId;
	    }
	    public function set label(label:String):void {
		    this._label = label;
	    }
    }
}