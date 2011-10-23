package classestrophy
{
    [RemoteClass(alias="classestrophy.PaymentMethods")]
    public class PaymentMethods
    {		
        private var paymentMethodsId:Number;
        private var label:String;
    
    	public function get paymentMethodsId() {
		return $this.paymentMethodsId;
	    }

    	public function get label() {
		return $this.label;
	    }

    
        public function set paymentMethodsId(paymentMethodsId:Number) {
		$this.paymentMethodsId = $paymentMethodsId;
	    }

        public function set label(label:String) {
		$this.label = $label;
	    }

    }