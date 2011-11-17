package classestrophy
{
    [RemoteClass(alias="classestrophy.Occupation")]
    public class Occupation
    {
	    private var _occupationId:Number;
	    private var _label:String;

	    // Getters
	    public function get occupationId():Number {
		    return this._occupationId;
	    }
	    public function get label():String {
		    return this._label;
	    }

	    // Setters
	    public function set occupationId(occupationId:Number):void {
		    this._occupationId = occupationId;
	    }
	    public function set label(label:String):void {
		    this._label = label;
	    }
    }
}