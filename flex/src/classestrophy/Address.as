package classestrophy
{
    [RemoteClass(alias="classestrophy.Address")]
    public class Address
    {
	    private var _addressId:Number;
	    private var _addressStreet:String;
	    private var _addressNumber:Number;
	    private var _addressBus:Number;
	    private var _cityId:Number;

	    // Getters
	    public function get addressId():Number {
		    return this._addressId;
	    }
	    public function get addressStreet():String {
		    return this._addressStreet;
	    }
	    public function get addressNumber():Number {
		    return this._addressNumber;
	    }
	    public function get addressBus():Number {
		    return this._addressBus;
	    }
	    public function get cityId():Number {
		    return this._cityId;
	    }

	    // Setters
	    public function set addressId(addressId:Number):void {
		    this._addressId = addressId;
	    }
	    public function set addressStreet(addressStreet:String):void {
		    this._addressStreet = addressStreet;
	    }
	    public function set addressNumber(addressNumber:Number):void {
		    this._addressNumber = addressNumber;
	    }
	    public function set addressBus(addressBus:Number):void {
		    this._addressBus = addressBus;
	    }
	    public function set cityId(cityId:Number):void {
		    this._cityId = cityId;
	    }
    }
}