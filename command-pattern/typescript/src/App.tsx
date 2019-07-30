import React from 'react'
import logo from './logo.svg'
import './App.css'
import StubItemRepository from './Infrastructure/Item/StubItemRepository'
import FetchItemsCommand from './Application/Item/FetchItemsCommand'
import FetchItemsCommandHandler from './Application/Item/FetchItemsCommandHandler'
import Item from './Domain/Entity/Item/Item'

interface Props {}
interface State {
  items: Item[]
}

class App extends React.Component<Props, State> {
  constructor (props: Props) {
    super(props)
    this.state = {
      items: []
    }
    this.fetchItems = this.fetchItems.bind(this)
  }

  fetchItems () {
    const commandHandler = new FetchItemsCommandHandler(new StubItemRepository())
    return commandHandler.handle(new FetchItemsCommand())
      .then((items: Item[]) => {
        this.setState({
          items: items
        })
      })
  }

  componentDidMount () {
    if (this.state.items.length === 0) {
      this.fetchItems()
    }
  }

  render () {
    const items = this.state.items
    return (
      <div className="App">
        <header className="App-header">
          <img src={logo} className="App-logo" alt="logo" />
          <p>
            Edit <code>src/App.tsx</code> and save to reload.
          </p>
          <a
            className="App-link"
            href="https://reactjs.org"
            target="_blank"
            rel="noopener noreferrer"
          >
            Learn React
          </a>
          <ul>
          {
            items.map((item: Item) =>
                <li key={item.id}>{ item.content }</li>
            )
          }
          </ul>
        </header>
      </div>
    )
  }
}

export default App
