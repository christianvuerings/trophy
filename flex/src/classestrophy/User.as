package classestrophy
{
	[RemoteClass(alias="classestrophy.User")]
	public class User
	{
		
		private var _userId:int;
		private var _firstName:String;
		private var _lastName:String;
		private var _email:String;
		private var _password:String;
		private var _lastLogin:Date;
		private var _memberSince:Date;
		private var _twitterId:String;
		private var _facebookId:String;
		private var _blogRss:String;
		private var _addressStreet:String;
		private var _addressNumber:String;
		private var _addressBus:String;
		private var _cityId:int;
		private var _telephone:String;
		private var _fax:String;
		private var _gsm:String;
		private var _languageId:int;
		
		// Getters
		public function get userId():int{
			return this._userId;
		}
		
		public function get firstName():String{
			return this._firstName;
		}
		
		public function get lastName():String{
			return this._lastName;
		}
		
		public function get email():String{
			return this._email;
		}
		
		public function get password():String{
			return this._password;
		}
		
		public function get lastLogin():Date{
			return this._lastLogin;
		}
		
		public function get memberSince():Date{
			return this._memberSince;
		}
		
		public function get twitterId():String{
			return this._twitterId;
		}
		
		public function get facebookId():String{
			return this._facebookId;
		}
		
		public function get blogRss():String{
			return this._blogRss;
		}
		
		public function get addressStreet():String{
			return this._addressStreet;
		}
		
		public function get addressNumber():String{
			return this._addressNumber;
		}
		
		public function get addressBus():String{
			return this._addressBus;
		}
		public function get cityId():int{
			return this._cityId;
		}
		
		public function get telephone():String{
			return this._telephone;
		}
		
		public function get fax():String{
			return this._fax;
		}
		
		public function get gsm():String{
			return this._gsm;
		}
		
		public function get languageId():int{
			return this._languageId;
		}
		
		// Setters
		public function set userId(userId:int):void{
			this._userId = userId;
		}
		public function set firstName(firstName:String):void{
			this._firstName = firstName;
		}
		public function set lastName(lastName:String):void{
			this._lastName = lastName;
		}
		public function set email(email:String):void{
			this._email = email;
		}
		public function set password(password:String):void{
			this._password = password;
		}
		public function set lastLogin(lastLogin:Date):void{
			this._lastLogin = lastLogin;
		}
		public function set memberSince(memberSince:Date):void{
			this._memberSince = memberSince;
		}
		public function set twitterId(twitterId:String):void{
			this._twitterId = twitterId;
		}
		public function set facebookId(facebookId:String):void{
			this._facebookId = facebookId;
		}
		public function set blogRss(blogRss:String):void{
			this._blogRss = blogRss;
		}
		public function set addressStreet(addressStreet:String):void{
			this._addressStreet = addressStreet;
		}
		public function set addressNumber(addressNumber:String):void{
			this._addressNumber = addressNumber;
		}
		public function set addressBus(addressBus:String):void{
			this._addressBus = addressBus;
		}
		public function set cityId(cityId:int):void{
			this._cityId = cityId;
		}
		public function set telephone(telephone:String):void{
			this._telephone = telephone;
		}
		public function set fax(fax:String):void{
			this._fax = fax;
		}
		public function set gsm(gsm:String):void{
			this._gsm = gsm;
		}
		public function set languageId(languageId:int):void{
			this._languageId = languageId;		
		}
		
		
	}
}