// import schemas and helpers
import Schemas from './Schemas';
import {convertToJson, getUrlParameter} from '../helpers/ServiceHelper';

const baseURL = "http://localhost/study-planner/api"

// Add User / signup
export const addUserAsync = async(data) => {
    const response = await fetch(baseURL+'/signup.php', {
        method: "POST",
        mode: 'cors',
        body: data
    });


    const responseData = await convertToJson(response);
    console.log(responseData);

    return Schemas.normalize(responseData, [Schemas.user]);
};