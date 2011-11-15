package mate.business
{
	public class TrophyManager{

		import mate.events.*;

		import mx.collections.ArrayCollection;
		import mx.controls.Alert;
		import mx.rpc.Fault;
		import mx.utils.ArrayUtil;


		public function RegisterCompleted(resultObject:Object):void {
			Alert.show("ok");
		}

		public function HandleFault(fault:Fault):void{
			Alert.show(fault.faultString, fault.faultCode.toString());
		}

	}
}