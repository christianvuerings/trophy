package classestrophy
{
    [RemoteClass(alias="classestrophy.PaymentMethod")]
    public class PaymentMethod
    {		
        private var paymentMethodId:Number;
        private var label:String;
    
    	public function get paymentMethodId() {
		return $this.paymentMethodId;
	    }

    	public function get label() {
		return $this.label;
	    }

    
        public function set paymentMethodId(paymentMethodId:Number) {
		$this.paymentMethodId = $paymentMethodId;
	    }

        public function set label(label:String) {
		$this.label = $label;
	    }

    }