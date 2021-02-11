import React, { Fragment } from 'react';
import _ from 'lodash';

export default class Anagram extends React.Component<any, any> {
  constructor(props: any) {
    super(props);
    this.state = { word: "" };
    this.handleChange = this.handleChange.bind(this);
  }

  handleChange(event: any) {
    this.setState({ word: event.target.value });
  }

  render() {
    return (
      <Fragment>
        <input type="text" className="form-control" placeholder="Enter a word"
          value={this.state.word} onChange={this.handleChange} />

        <section className={this.state.word ? "mb-3" : "d-none"}>
          <h2 className="my-3">Anagrams of {this.state.word}</h2>
          {/* TODO: replace with actual anagrams */}
          <ul className="list-group">
            {this.state.word.split('').map((ch: string) => {
              return (<li className="list-group-item">{ch}</li>);
            })}
          </ul>
        </section>
      </Fragment>
    );
  }
}
