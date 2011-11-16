package mate.business
{
	import flashx.textLayout.factory.TruncationOptions;

	public class TrophyManager{

		import mate.events.*;

		import mx.collections.ArrayCollection;
		import mx.controls.Alert;
		import mx.rpc.Fault;
		import mx.utils.ArrayUtil;

		private var _isLoggedIn:Boolean = false;

		// Getters & Setters
		public function get isLoggedIn():Boolean {
			return _isLoggedIn;
		}
		public function set isLoggedIn(value:Boolean):void {
			_isLoggedIn = value;
		}

		public function RegisterCompleted(resultObject:Object):void {
			Alert.show("ok");
		}

		public function LoginCompleted(resultObject:Object):void {
			isLoggedIn = true;
		}

		public function HandleFault(fault:Fault):void{
			Alert.show(fault.faultString, fault.faultCode.toString());
		}

	}
}