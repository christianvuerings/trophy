package classestrophy
{
	[RemoteClass(alias="classestrophy.Users")]
	public class Users
	{
		private var usersId:Number;
		private var firstName:String;
		private var lastName:String;
		private var email:String;
		private var password:String;
		private var lastLogin:Date;
		private var memberSince:Date;
		private var twitterId:String;
		private var facebookId:String;
		private var blogRss:String;
		private var addressStreet:String;
		private var addressNumber:String;
		private var addressBus:String;
		private var citiesId:Number;
		private var telephone:String;
		private var fax:String;
		private var gsm:String;
		private var languagesId:Number;

		// Getters
		public function get usersId() {
			return this.usersId;
		}
		public function get firstName() {
			return this.firstName;
		}
		public function get lastName() {
			return this.lastName;
		}
		public function get email() {
			return this.email;
		}
		public function get password() {
			return this.password;
		}
		public function get lastLogin() {
			return this.lastLogin;
		}
		public function get memberSince() {
			return this.memberSince;
		}
		public function get twitterId() {
			return this.twitterId;
		}
		public function get facebookId() {
			return this.facebookId;
		}
		public function get blogRss() {
			return this.blogRss;
		}
		public function get addressStreet() {
			return this.addressStreet;
		}
		public function get addressNumber() {
			return this.addressNumber;
		}
		public function get addressBus() {
			return this.addressBus;
		}
		public function get citiesId() {
			return this.citiesId;
		}
		public function get telephone() {
			return this.telephone;
		}
		public function get fax() {
			return this.fax;
		}
		public function get gsm() {
			return this.gsm;
		}
		public function get languagesId() {
			return this.languagesId;
		}

		// Setters
		public function set usersId(usersId:Number) {
			this.usersId = usersId;
		}
		public function set firstName(firstName:String) {
			this.firstName = firstName;
		}
		public function set lastName(lastName:String) {
			this.lastName = lastName;
		}
		public function set email(email:String) {
			this.email = email;
		}
		public function set password(password:String) {
			this.password = password;
		}
		public function set lastLogin(lastLogin:Date) {
			this.lastLogin = lastLogin;
		}
		public function set memberSince(memberSince:Date) {
			this.memberSince = memberSince;
		}
		public function set twitterId(twitterId:String) {
			this.twitterId = twitterId;
		}
		public function set facebookId(facebookId:String) {
			this.facebookId = facebookId;
		}
		public function set blogRss(blogRss:String) {
			this.blogRss = blogRss;
		}
		public function set addressStreet(addressStreet:String) {
			this.addressStreet = addressStreet;
		}
		public function set addressNumber(addressNumber:String) {
			this.addressNumber = addressNumber;
		}
		public function set addressBus(addressBus:String) {
			this.addressBus = addressBus;
		}
		public function set citiesId(citiesId:Number) {
			this.citiesId = citiesId;
		}
		public function set telephone(telephone:String) {
			this.telephone = telephone;
		}
		public function set fax(fax:String) {
			this.fax = fax;
		}
		public function set gsm(gsm:String) {
			this.gsm = gsm;
		}
		public function set languagesId(languagesId:Number) {
			this.languagesId = languagesId;
		}
}