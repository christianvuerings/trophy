package classestrophy
{
    [RemoteClass(alias="classestrophy.Payment")]
    public class Payment
    {		
        private var paymentId:Number;
        private var date:Date;
        private var amount:Number;
        private var userId:Number;
        private var paymentMethodId:Number;
    
    	public function get paymentId() {
		return $this.paymentId;
	    }

    	public function get date() {
		return $this.date;
	    }

    	public function get amount() {
		return $this.amount;
	    }

    	public function get userId() {
		return $this.userId;
	    }

    	public function get paymentMethodId() {
		return $this.paymentMethodId;
	    }

    
        public function set paymentId(paymentId:Number) {
		$this.paymentId = $paymentId;
	    }

        public function set date(date:Date) {
		$this.date = $date;
	    }

        public function set amount(amount:Number) {
		$this.amount = $amount;
	    }

        public function set userId(userId:Number) {
		$this.userId = $userId;
	    }

        public function set paymentMethodId(paymentMethodId:Number) {
		$this.paymentMethodId = $paymentMethodId;
	    }

    }