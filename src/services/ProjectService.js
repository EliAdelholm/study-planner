// import schemas and helpers
import Schemas from './Schemas';
import {convertToJson} from '../helpers/ServiceHelper';

// Add User / signup
export const addProjectAsync = async(data) => {
    const response = await fetch('../../api/add-project.php', {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            "data": data
})
    });


    const responseData = await convertToJson(response);

    return Schemas.normalize(responseData, [Schemas.user]);
};