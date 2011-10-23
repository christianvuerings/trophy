package classestrophy
{
    [RemoteClass(alias="classestrophy.UsersOccupations")]
    public class UsersOccupations
    {		
        private var occupationsId:Number;
    
    	public function get occupationsId() {
		return $this.occupationsId;
	    }

    
        public function set occupationsId(occupationsId:Number) {
		$this.occupationsId = $occupationsId;
	    }

    }