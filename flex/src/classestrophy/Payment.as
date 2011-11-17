package classestrophy
{
    [RemoteClass(alias="classestrophy.Payment")]
    public class Payment
    {
	    private var _paymentId:Number;
	    private var _date:Date;
	    private var _amount:Number;
	    private var _userId:Number;
	    private var _paymentMethodId:Number;

	    // Getters
	    public function get paymentId():Number {
		    return this._paymentId;
	    }
	    public function get date():Date {
		    return this._date;
	    }
	    public function get amount():Number {
		    return this._amount;
	    }
	    public function get userId():Number {
		    return this._userId;
	    }
	    public function get paymentMethodId():Number {
		    return this._paymentMethodId;
	    }

	    // Setters
	    public function set paymentId(paymentId:Number):void {
		    this._paymentId = paymentId;
	    }
	    public function set date(date:Date):void {
		    this._date = date;
	    }
	    public function set amount(amount:Number):void {
		    this._amount = amount;
	    }
	    public function set userId(userId:Number):void {
		    this._userId = userId;
	    }
	    public function set paymentMethodId(paymentMethodId:Number):void {
		    this._paymentMethodId = paymentMethodId;
	    }
    }
}