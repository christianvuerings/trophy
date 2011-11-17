package classestrophy
{
    [RemoteClass(alias="classestrophy.Practice")]
    public class Practice
    {
	    private var _practiceId:Number;
	    private var _name:String;
	    private var _telephone:String;
	    private var _fax:String;
	    private var _addressId:Number;

	    // Getters
	    public function get practiceId():Number {
		    return this._practiceId;
	    }
	    public function get name():String {
		    return this._name;
	    }
	    public function get telephone():String {
		    return this._telephone;
	    }
	    public function get fax():String {
		    return this._fax;
	    }
	    public function get addressId():Number {
		    return this._addressId;
	    }

	    // Setters
	    public function set practiceId(practiceId:Number):void {
		    this._practiceId = practiceId;
	    }
	    public function set name(name:String):void {
		    this._name = name;
	    }
	    public function set telephone(telephone:String):void {
		    this._telephone = telephone;
	    }
	    public function set fax(fax:String):void {
		    this._fax = fax;
	    }
	    public function set addressId(addressId:Number):void {
		    this._addressId = addressId;
	    }
    }
}