package classestrophy
{
    [RemoteClass(alias="classestrophy.PaymentMethod")]
    public class PaymentMethod
    {
	    private var _paymentMethodId:Number;
	    private var _label:String;

	    // Getters
	    public function get paymentMethodId():Number {
		    return this._paymentMethodId;
	    }
	    public function get label():String {
		    return this._label;
	    }

	    // Setters
	    public function set paymentMethodId(paymentMethodId:Number):void {
		    this._paymentMethodId = paymentMethodId;
	    }
	    public function set label(label:String):void {
		    this._label = label;
	    }
    }
}