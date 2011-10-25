package classestrophy
{
	[RemoteClass(alias="classestrophy.Payments")]
	public class Payments
	{
		private var paymentsId:Number;
		private var date:Date;
		private var amount:Number;
		private var usersId:Number;
		private var paymentMethodsId:Number;

		// Getters
		public function get paymentsId() {
			return this.paymentsId;
		}
		public function get date() {
			return this.date;
		}
		public function get amount() {
			return this.amount;
		}
		public function get usersId() {
			return this.usersId;
		}
		public function get paymentMethodsId() {
			return this.paymentMethodsId;
		}

		// Setters
		public function set paymentsId(paymentsId:Number) {
			this.paymentsId = paymentsId;
		}
		public function set date(date:Date) {
			this.date = date;
		}
		public function set amount(amount:Number) {
			this.amount = amount;
		}
		public function set usersId(usersId:Number) {
			this.usersId = usersId;
		}
		public function set paymentMethodsId(paymentMethodsId:Number) {
			this.paymentMethodsId = paymentMethodsId;
		}
}