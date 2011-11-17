package classestrophy
{
    [RemoteClass(alias="classestrophy.City")]
    public class City
    {
	    private var _id:Number;
	    private var _alpha:String;
	    private var _longitude:Number;
	    private var _latitude:Number;
	    private var _code:String;
	    private var _name:String;
	    private var _provinceId:Number;

	    // Getters
	    public function get id():Number {
		    return this._id;
	    }
	    public function get alpha():String {
		    return this._alpha;
	    }
	    public function get longitude():Number {
		    return this._longitude;
	    }
	    public function get latitude():Number {
		    return this._latitude;
	    }
	    public function get code():String {
		    return this._code;
	    }
	    public function get name():String {
		    return this._name;
	    }
	    public function get provinceId():Number {
		    return this._provinceId;
	    }

	    // Setters
	    public function set id(id:Number):void {
		    this._id = id;
	    }
	    public function set alpha(alpha:String):void {
		    this._alpha = alpha;
	    }
	    public function set longitude(longitude:Number):void {
		    this._longitude = longitude;
	    }
	    public function set latitude(latitude:Number):void {
		    this._latitude = latitude;
	    }
	    public function set code(code:String):void {
		    this._code = code;
	    }
	    public function set name(name:String):void {
		    this._name = name;
	    }
	    public function set provinceId(provinceId:Number):void {
		    this._provinceId = provinceId;
	    }
    }
}