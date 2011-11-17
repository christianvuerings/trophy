package classestrophy
{
    [RemoteClass(alias="classestrophy.Province")]
    public class Province
    {
	    private var _provinceId:Number;
	    private var _label:String;
	    private var _countryId:String;

	    // Getters
	    public function get provinceId():Number {
		    return this._provinceId;
	    }
	    public function get label():String {
		    return this._label;
	    }
	    public function get countryId():String {
		    return this._countryId;
	    }

	    // Setters
	    public function set provinceId(provinceId:Number):void {
		    this._provinceId = provinceId;
	    }
	    public function set label(label:String):void {
		    this._label = label;
	    }
	    public function set countryId(countryId:String):void {
		    this._countryId = countryId;
	    }
    }
}