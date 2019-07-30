export default interface ICommandHandler<T, R> {
  handle (command: T): R
}
