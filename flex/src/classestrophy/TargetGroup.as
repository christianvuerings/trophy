package classestrophy
{
    [RemoteClass(alias="classestrophy.TargetGroup")]
    public class TargetGroup
    {
	    private var _targetGroupId:Number;
	    private var _label:String;

	    // Getters
	    public function get targetGroupId():Number {
		    return this._targetGroupId;
	    }
	    public function get label():String {
		    return this._label;
	    }

	    // Setters
	    public function set targetGroupId(targetGroupId:Number):void {
		    this._targetGroupId = targetGroupId;
	    }
	    public function set label(label:String):void {
		    this._label = label;
	    }
    }
}