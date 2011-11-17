package mate.business
{

	import classestrophy.User;
	
	import com.asfusion.mate.core.GlobalDispatcher;
	import com.asfusion.mate.events.Dispatcher;
	
	import flashx.textLayout.factory.TruncationOptions;
	
	import mate.views.aftersearch;

	public class TrophyManager{

		import mate.events.*;

		import mx.collections.ArrayCollection;
		import mx.controls.Alert;
		import mx.rpc.Fault;
		import mx.utils.ArrayUtil;

		[Bindable]
		public var dispatcher:GlobalDispatcher;

		private var _isLoggedIn:Boolean = false;
		private var _user:User;
		private var _users:ArrayCollection;

		// Getters & Setters

		[Bindable]
		public function get users():ArrayCollection{
			return _users;
		}

		public function set users(value:ArrayCollection):void {
			_users = value;
		}

		[Bindable]
		public function get user():User {
			return _user;
		}
		public function set user(value:User):void {
			_user = value;
		}

		public function get isLoggedIn():Boolean {
			return _isLoggedIn;
		}
		public function set isLoggedIn(value:Boolean):void {
			_isLoggedIn = value;
		}

		public function RegisterCompleted(resultObject:Object):void {
			if(resultObject) {
				Alert.show("Gebruiker is geregistreerd");
				var changeGlobalStateEvent:GlobalStateEvent = new GlobalStateEvent(GlobalStateEvent.CHANGEGLOBALSTATE);
				changeGlobalStateEvent.globalstate = "mainsearchview";
				dispatcher.dispatchEvent(changeGlobalStateEvent);
			} else {
				Alert.show("Een gebruiker met die email bestaat al");
			}
		}

		public function LoginCompleted(resultObject:Object):void {
			if(resultObject[0].userId){
				user = new User();
				user.firstName = resultObject[0].firstName;
				user.lastName = resultObject[0].lastName;
				user.email = resultObject[0].email;
				user.userId = resultObject[0].userId;
				isLoggedIn = true;
				var changeGlobalStateEvent:GlobalStateEvent = new GlobalStateEvent(GlobalStateEvent.CHANGEGLOBALSTATE);
				changeGlobalStateEvent.globalstate = "loggedin";
				dispatcher.dispatchEvent(changeGlobalStateEvent);
			} else {
				isLoggedIn = false;
			}
		}

		public function SearchCompleted(resultObject:Object):void {
			users = new ArrayCollection();
			for each (var user:User in resultObject){
				var userAdd:User = user;
				users.addItem(user);
			}
			/*if (users.length != 0){
				for each(var showUser:User in users){
					lblContent.text = showUser.firstName;
				}
			} 
			else{ 
				lblContent.text = 'Er konden geen gebruikers gevonden worden';
			}*/
		}
		
		public function HandleFault(fault:Fault):void{
			Alert.show(fault.faultString, fault.faultCode.toString());
		}

	}
}