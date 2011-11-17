package classestrophy
{
    [RemoteClass(alias="classestrophy.Specialty")]
    public class Specialty
    {
	    private var _specialtyId:Number;
	    private var _label:String;

	    // Getters
	    public function get specialtyId():Number {
		    return this._specialtyId;
	    }
	    public function get label():String {
		    return this._label;
	    }

	    // Setters
	    public function set specialtyId(specialtyId:Number):void {
		    this._specialtyId = specialtyId;
	    }
	    public function set label(label:String):void {
		    this._label = label;
	    }
    }
}