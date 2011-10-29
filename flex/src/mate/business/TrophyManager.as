package mate.business
{
	public class TrophyManager {
		import classestrophy.*;
		import mate.events.*;

		import mx.controls.Alert;
		import mx.rpc.Fault;

		public function HandleFault(fault:Fault):void{
			Alert.show(fault.faultString, fault.faultCode.toString());
		}

	}
}