import { PROJECT_ADDED } from '../actions/projectActionCreator';

export default (state = {}, action) => {

    if (action.type === PROJECT_ADDED) {
        return {
            ...state,
            ...action.payload
        };
    }

    return state;
}