import { batchActions } from 'redux-batched-actions';

import * as ProjectService from '../services/ProjectService';

export const PROJECT_ADDED = 'user/PROJECT_ADDED';
const addProject = (projects = {}) => ({
    type: PROJECT_ADDED,
    payload: projects,
});

export const createProject = (data) => {
    return async (dispatch) => {
        const response = await ProjectService.addProjectAsync(data);

        dispatch(batchActions([
            addProject(response.entities.projects),
        ]));
    }
};