package classestrophy
{
    [RemoteClass(alias="classestrophy.User")]
    public class User
    {		
        private var userId:Number;
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
        private var cityId:Number;
        private var telephone:String;
        private var fax:String;
        private var gsm:String;
        private var languageId:Number;
    
    	public function get userId():Number {
			return this.userId;
	    }

    	public function get firstName():String {
			return this.firstName;
	    }

    	public function get lastName():String {
			return this.lastName;
	    }

    	public function get email():String {
			return this.email;
	    }

    	public function get password():String {
			return this.password;
	    }

    	public function get lastLogin():Date {
			return this.lastLogin;
	    }

    	public function get memberSince():Date {
			return this.memberSince;
	    }

    	public function get twitterId():String {
			return this.twitterId;
	    }

    	public function get facebookId()String {
			return this.facebookId;
	    }

    	public function get blogRss()String {
			return this.blogRss;
	    }

    	public function get addressStreet():String {
			return this.addressStreet;
	    }

    	public function get addressNumber():String {
			return this.addressNumber;
	    }

    	public function get addressBus():String {
			return this.addressBus;
	    }

    	public function get cityId():Number {
			return this.cityId;
	    }

    	public function get telephone():String {
			return this.telephone;
	    }

    	public function get fax():String {
			return this.fax;
	    }

    	public function get gsm():String {
			return this.gsm;
	    }

    	public function get languageId():Number {
			return this.languageId;
	    }

    
        public function set userId(userId:Number):void {
			this.userId = userId;
	    }

        public function set firstName(firstName:String):void {
			this.firstName = firstName;
	    }

        public function set lastName(lastName:String):void {
			this.lastName = lastName;
	    }

        public function set email(email:String):void {
	    	this.email = email;
	    }

        public function set password(password:String):void {
			this.password = password;
	    }

        public function set lastLogin(lastLogin:Date):void {
			this.lastLogin = lastLogin;
	    }

        public function set memberSince(memberSince:Date):void {
			this.memberSince = memberSince;
	    }

        public function set twitterId(twitterId:String):void {
			this.twitterId = twitterId;
	    }

        public function set facebookId(facebookId:String):void {
			this.facebookId = facebookId;
	    }

        public function set blogRss(blogRss:String):void {
			this.blogRss = blogRss;
	    }

        public function set addressStreet(addressStreet:String):void {
			this.addressStreet = addressStreet;
	    }

        public function set addressNumber(addressNumber:String):void {
			this.addressNumber = addressNumber;
	    }

        public function set addressBus(addressBus:String):void {
			this.addressBus = addressBus;
	    }

        public function set cityId(cityId:Number):void {
			this.cityId = cityId;
	    }

        public function set telephone(telephone:String):void {
			this.telephone = telephone;
	    }

        public function set fax(fax:String):void {
			this.fax = fax;
	    }

        public function set gsm(gsm:String):void{
			this.gsm = gsm;
	    }

        public function set languageId(languageId:Number):void {
			this.languageId = languageId;
	    }

    }