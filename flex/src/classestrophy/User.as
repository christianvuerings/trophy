package classestrophy
{
    [RemoteClass(alias="classestrophy.User")]
    public class User
    {
	    private var _userId:Number;
	    private var _firstName:String;
	    private var _lastName:String;
	    private var _email:String;
	    private var _password:String;
	    private var _lastLogin:Number;
	    private var _memberSince:Number;
	    private var _languageId:String;
	    private var _addressId:Number;
	    private var _gsm:String;
	    private var _avatar:String;
	    private var _twitter:String;
	    private var _facebook:String;
	    private var _rss:String;

	    // Getters
	    public function get userId():Number {
		    return this._userId;
	    }
	    public function get firstName():String {
		    return this._firstName;
	    }
	    public function get lastName():String {
		    return this._lastName;
	    }
	    public function get email():String {
		    return this._email;
	    }
	    public function get password():String {
		    return this._password;
	    }
	    public function get lastLogin():Number {
		    return this._lastLogin;
	    }
	    public function get memberSince():Number {
		    return this._memberSince;
	    }
	    public function get languageId():String {
		    return this._languageId;
	    }
	    public function get addressId():Number {
		    return this._addressId;
	    }
	    public function get gsm():String {
		    return this._gsm;
	    }
	    public function get avatar():String {
		    return this._avatar;
	    }
	    public function get twitter():String {
		    return this._twitter;
	    }
	    public function get facebook():String {
		    return this._facebook;
	    }
	    public function get rss():String {
		    return this._rss;
	    }

	    // Setters
	    public function set userId(userId:Number):void {
		    this._userId = userId;
	    }
	    public function set firstName(firstName:String):void {
		    this._firstName = firstName;
	    }
	    public function set lastName(lastName:String):void {
		    this._lastName = lastName;
	    }
	    public function set email(email:String):void {
		    this._email = email;
	    }
	    public function set password(password:String):void {
		    this._password = password;
	    }
	    public function set lastLogin(lastLogin:Number):void {
		    this._lastLogin = lastLogin;
	    }
	    public function set memberSince(memberSince:Number):void {
		    this._memberSince = memberSince;
	    }
	    public function set languageId(languageId:String):void {
		    this._languageId = languageId;
	    }
	    public function set addressId(addressId:Number):void {
		    this._addressId = addressId;
	    }
	    public function set gsm(gsm:String):void {
		    this._gsm = gsm;
	    }
	    public function set avatar(avatar:String):void {
		    this._avatar = avatar;
	    }
	    public function set twitter(twitter:String):void {
		    this._twitter = twitter;
	    }
	    public function set facebook(facebook:String):void {
		    this._facebook = facebook;
	    }
	    public function set rss(rss:String):void {
		    this._rss = rss;
	    }
    }
}