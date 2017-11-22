import { batchActions } from 'redux-batched-actions';

import * as UserService from '../services/UserService';

export const USER_ADDED = 'user/USER_ADDED';
const addUser = (users = {}) => ({
    type: USER_ADDED,
    payload: users,
});

export const createUser = (data) => {
    return async (dispatch) => {
        const response = await UserService.addUserAsync(data);

        dispatch(batchActions([
            addUser(response.entities.users),
        ]));
    }
};


