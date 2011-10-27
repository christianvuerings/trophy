package mate.business
{
	public class TrophyManager {
		import classestrophy.*;
		import mate.events.*;

		import mx.controls.Alert;
		import mx.rpc.Fault;

		private var _isloggedin:Boolean;
		[Bindable]
		public function set isloggedin(isloggedin:Boolean):void{
			this._isloggedin = isloggedin;
		}
		public function get isloggedin():Boolean{
			return this._isloggedin;
		}

		public function HandleFault(fault:Fault):void{
			Alert.show(fault.faultString, fault.faultCode.toString());
		}

	}
}