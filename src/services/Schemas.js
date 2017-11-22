import { normalize, schema } from 'normalizr';

const user = new schema.Entity('users', {}, {idAttribute: 'id'});

const project = new schema.Entity('projects', {}, {idAttribute: 'id'});

export default {
    user,
    project,

    normalize,
    schema
} 