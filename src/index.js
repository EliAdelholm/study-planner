import React from 'react';
import ReactDOM from 'react-dom';
import './styles/css/index.css';
// import GuestHome from './containers/guest/index.js';
import UserHome from './containers/user/index'
import registerServiceWorker from './registerServiceWorker';

import {Provider} from 'react-redux';
import {createStore, compose, applyMiddleware} from 'redux';
import thunk from 'redux-thunk';
import {enableBatching} from 'redux-batched-actions';

// Import Reducers
import rootReducer from './reducers';

const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ ? window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__({}) : compose;

const enhancer = composeEnhancers(
    applyMiddleware(thunk),
);

const store = createStore(enableBatching(rootReducer), enhancer);

ReactDOM.render(
	<Provider store={store}>
		<UserHome />
	</Provider>,
	document.getElementById('root')
);
registerServiceWorker();
