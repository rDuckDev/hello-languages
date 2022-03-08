import React, { Fragment } from 'react';
import { BrowserRouter as Router, Link } from 'react-router-dom';

import logo from '../logo.svg';

export default class Header extends React.Component<any, any> {
  render() {
    return (
      <Router>
        <nav className="navbar navbar-expand-sm navbar-dark bg-dark">
          <div className="container">
            <span className="navbar-brand">
              <img src={logo} style={{ width: 50 }} />
              <span style={{ verticalAlign: "middle" }}>Three Apps: ReactJS</span>
            </span>

            <div className="navbar-collapse">
              <ul className="navbar-nav mr-auto">
                <li className="nav-item"><Link className="nav-link" to="/">Home</Link></li>
                <li className="nav-item"><Link className="nav-link" to="/anagram">Anagram</Link></li>
              </ul>
            </div>
          </div>
        </nav>
      </Router>
    );
  }
}
