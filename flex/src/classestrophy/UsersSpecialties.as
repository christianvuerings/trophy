package classestrophy
{
    [RemoteClass(alias="classestrophy.UsersSpecialties")]
    public class UsersSpecialties
    {		
        private var specialtiesId:Number;
    
    	public function get specialtiesId() {
		return $this.specialtiesId;
	    }

    
        public function set specialtiesId(specialtiesId:Number) {
		$this.specialtiesId = $specialtiesId;
	    }

    }